const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

(async () => {
    try {
        console.log("Launching browser...");
        const browser = await puppeteer.launch({ headless: 'new' });
        const page = await browser.newPage();
        
        page.setDefaultNavigationTimeout(60000);
        await page.setViewport({ width: 1920, height: 1080 });

        console.log("Logging in...");
        await page.goto('http://127.0.0.1:8000/login', { waitUntil: 'networkidle0' });
        await page.type('input[name="email"]', 'docadmin@example.com');
        await page.type('input[name="password"]', 'password123');
        await Promise.all([
            page.click('button[type="submit"]'),
            page.waitForNavigation({ waitUntil: 'networkidle0' }),
        ]);

        const outDir = path.join(__dirname, 'public', 'docs-assets');
        if (!fs.existsSync(outDir)) fs.mkdirSync(outDir, { recursive: true });

        const hideSidebar = async () => {
            await page.evaluate(() => {
                document.body.classList.add('sidebar-collapse');
                document.body.classList.remove('sidebar-open');
                let s = document.getElementById('hide-sidebar-css');
                if (!s) {
                    s = document.createElement('style');
                    s.id = 'hide-sidebar-css';
                    s.textContent = `.main-sidebar,.sidebar{display:none!important;width:0!important}.content-wrapper,.main-footer{margin-left:0!important;margin-right:0!important}`;
                    document.head.appendChild(s);
                }
            });
            await new Promise(r => setTimeout(r, 300));
        };

        // Correct IDs from database: Cat=2, Prod=4, Blog=2, Slider=1, Page=1, Branch=1, Cert=1, Counter=1, Faq=1, Seo=1, Role=1, User=1
        const pagesToSnap = [
            { url: 'http://127.0.0.1:8000/dashboard', name: 'dashboard' },
            { url: 'http://127.0.0.1:8000/categories', name: 'categories' },
            { url: 'http://127.0.0.1:8000/categories/create', name: 'categories-create' },
            { url: 'http://127.0.0.1:8000/categories/2/edit', name: 'categories-edit' },
            { url: 'http://127.0.0.1:8000/products', name: 'products' },
            { url: 'http://127.0.0.1:8000/products/create', name: 'products-create' },
            { url: 'http://127.0.0.1:8000/products/4/edit', name: 'products-edit' },
            { url: 'http://127.0.0.1:8000/blogs', name: 'blogs' },
            { url: 'http://127.0.0.1:8000/blogs/create', name: 'blogs-create' },
            { url: 'http://127.0.0.1:8000/blogs/2/edit', name: 'blogs-edit' },
            { url: 'http://127.0.0.1:8000/admin/sliders', name: 'sliders' },
            { url: 'http://127.0.0.1:8000/admin/sliders/create', name: 'sliders-create' },
            { url: 'http://127.0.0.1:8000/admin/sliders/1/edit', name: 'sliders-edit' },
            { url: 'http://127.0.0.1:8000/admin/pages', name: 'pages' },
            { url: 'http://127.0.0.1:8000/admin/pages/1/edit', name: 'pages-edit' },
            { url: 'http://127.0.0.1:8000/admin/branches', name: 'branches' },
            { url: 'http://127.0.0.1:8000/admin/branches/create', name: 'branches-create' },
            { url: 'http://127.0.0.1:8000/admin/branches/1/edit', name: 'branches-edit' },
            { url: 'http://127.0.0.1:8000/admin/map_locations', name: 'map-locations' },
            { url: 'http://127.0.0.1:8000/admin/map_locations/create', name: 'map-locations-create' },
            { url: 'http://127.0.0.1:8000/admin/certificates', name: 'certificates' },
            { url: 'http://127.0.0.1:8000/admin/certificates/create', name: 'certificates-create' },
            { url: 'http://127.0.0.1:8000/admin/certificates/1/edit', name: 'certificates-edit' },
            { url: 'http://127.0.0.1:8000/admin/counters', name: 'counters' },
            { url: 'http://127.0.0.1:8000/admin/counters/create', name: 'counters-create' },
            { url: 'http://127.0.0.1:8000/admin/counters/1/edit', name: 'counters-edit' },
            { url: 'http://127.0.0.1:8000/admin/faqs', name: 'faqs' },
            { url: 'http://127.0.0.1:8000/admin/faqs/create', name: 'faqs-create' },
            { url: 'http://127.0.0.1:8000/admin/faqs/1/edit', name: 'faqs-edit' },
            { url: 'http://127.0.0.1:8000/admin/seo', name: 'seo' },
            { url: 'http://127.0.0.1:8000/admin/seo/create', name: 'seo-create' },
            { url: 'http://127.0.0.1:8000/admin/seo/1/edit', name: 'seo-edit' },
            { url: 'http://127.0.0.1:8000/admin/roles', name: 'roles' },
            { url: 'http://127.0.0.1:8000/admin/roles/create', name: 'roles-create' },
            { url: 'http://127.0.0.1:8000/admin/roles/1/edit', name: 'roles-edit' },
            { url: 'http://127.0.0.1:8000/users', name: 'users' },
            { url: 'http://127.0.0.1:8000/users/create', name: 'users-create' },
            { url: 'http://127.0.0.1:8000/users/1/edit', name: 'users-edit' },
            { url: 'http://127.0.0.1:8000/admin/settings', name: 'settings' },
            { url: 'http://127.0.0.1:8000/admin/activity_logs', name: 'logs' },
        ];

        // Also capture the login page (before login, use a fresh page)
        const loginPage = await browser.newPage();
        await loginPage.setViewport({ width: 1920, height: 1080 });
        await loginPage.goto('http://127.0.0.1:8000/login', { waitUntil: 'networkidle0' });
        await loginPage.screenshot({ path: path.join(outDir, 'login-ar.png'), fullPage: true });
        // Switch to EN for login
        await loginPage.goto('http://127.0.0.1:8000/locale/en', { waitUntil: 'networkidle0' });
        await loginPage.goto('http://127.0.0.1:8000/login', { waitUntil: 'networkidle0' });
        await loginPage.screenshot({ path: path.join(outDir, 'login-en.png'), fullPage: true });
        // Switch back to AR
        await loginPage.goto('http://127.0.0.1:8000/locale/ar', { waitUntil: 'networkidle0' });
        await loginPage.close();
        console.log("Captured login pages.");

        let totalCaptured = 2; // login pages

        // ARABIC
        console.log("Setting language to Arabic...");
        await page.goto('http://127.0.0.1:8000/locale/ar', { waitUntil: 'networkidle0' });
        for (const p of pagesToSnap) {
            try {
                console.log(`[AR] ${p.url}...`);
                await page.goto(p.url, { waitUntil: 'networkidle0' });
                await hideSidebar();
                await page.screenshot({ path: path.join(outDir, `${p.name}-ar.png`), fullPage: true });
                totalCaptured++;
            } catch (e) { console.log(`  [SKIP] ${p.name}-ar: ${e.message}`); }
        }

        // ENGLISH
        console.log("Switching to English...");
        await page.goto('http://127.0.0.1:8000/locale/en', { waitUntil: 'networkidle0' });
        for (const p of pagesToSnap) {
            try {
                console.log(`[EN] ${p.url}...`);
                await page.goto(p.url, { waitUntil: 'networkidle0' });
                await hideSidebar();
                await page.screenshot({ path: path.join(outDir, `${p.name}-en.png`), fullPage: true });
                totalCaptured++;
            } catch (e) { console.log(`  [SKIP] ${p.name}-en: ${e.message}`); }
        }

        await page.goto('http://127.0.0.1:8000/locale/ar', { waitUntil: 'networkidle0' });
        await browser.close();
        console.log(`SUCCESS: Captured ${totalCaptured} screenshots!`);
    } catch (err) {
        console.error("ERROR:", err);
    }
})();
