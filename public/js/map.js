function initAgentMap() {
    if (!window.currentLang) window.currentLang = "en";

    const mapTranslations = {
        YE: { en: "Yemen", ar: "اليمن", fr: "Yemen", es: "Yemen" },
        SA: {
            en: "Saudi Arabia",
            ar: "المملكة العربية السعودية",
            fr: "Arabie Saoudite",
            es: "Arabia Saudita",
        },
        QA: { en: "Qatar", ar: "قطر", fr: "Qatar", es: "Catar" },
        OM: { en: "Oman", ar: "عُمان", fr: "Oman", es: "Oman" },
        US: {
            en: "United States",
            ar: "الولايات المتحدة الأمريكية",
            fr: "Etats-Unis",
            es: "Estados Unidos",
        },
        EG: { en: "Egypt", ar: "مصر", fr: "Egypte", es: "Egipto" },
        PS: { en: "Palestine", ar: "فلسطين", fr: "Palestine", es: "Palestina" },
        LB: { en: "Lebanon", ar: "لبنان", fr: "Liban", es: "Libano" },
        JO: { en: "Jordan", ar: "الأردن", fr: "Jordanie", es: "Jordania" },
        visit: {
            en: "Visit Website",
            ar: "زيارة الموقع",
            fr: "Visiter le site",
            es: "Visitar sitio web",
        },
    };

    const chartDiv = document.getElementById("chartdiv");

    if (!chartDiv) {
        return;
    }

    let resizeTimeout;
    let resizeDebounce;

    function createGlobeChart() {
        if (resizeTimeout) {
            clearTimeout(resizeTimeout);
        }

        if (window.root && !window.root.isDisposed()) {
            window.root.dispose();
            window.root = null;
        }

        try {
            const root = am5.Root.new("chartdiv");
            window.root = root;

            root.autoResize = true;
            root.width = chartDiv.clientWidth;
            root.height = chartDiv.clientHeight;
            root.setThemes([am5themes_Animated.new(root)]);

            const chart = root.container.children.push(
                am5map.MapChart.new(root, {
                    panX: "rotateX",
                    panY: "rotateY",
                    projection: am5map.geoOrthographic(),
                    rotationX: -40,
                    rotationY: -20,
                    homeZoomLevel: 2.5,
                    homeGeoPoint: { longitude: 45, latitude: 25 },
                }),
            );

            const polygonSeries = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    geoJSON: am5geodata_worldLow,
                }),
            );

            polygonSeries.mapPolygons.template.setAll({
                interactive: true,
                fill: am5.color(0xe0e0e0),
                stroke: am5.color(0xffffff),
                strokeWidth: 1,
            });

            const countryColors = {
                YE: am5.color(0x8d6e63),
                PS: am5.color(0xa1887f),
                SA: am5.color(0xc9a24d),
                QA: am5.color(0x9c27b0),
                OM: am5.color(0xff9800),
                EG: am5.color(0x2e7d32),
                LB: am5.color(0xc62828),
                US: am5.color(0x3f51b5),
                JO: am5.color(0x1e88e5),
            };

            polygonSeries.events.on("datavalidated", () => {
                polygonSeries.mapPolygons.each((polygon) => {
                    const id = polygon.dataItem.get("id");
                    if (countryColors[id]) {
                        polygon.set("fill", countryColors[id]);
                    }
                });
            });

            const pinSeries = chart.series.push(
                am5map.MapPointSeries.new(root, {
                    latitudeField: "latitude",
                    longitudeField: "longitude",
                }),
            );

            const dbLocations = Array.isArray(window.mapLocationsData)
                ? window.mapLocationsData.map((loc) => ({
                    id: loc.id,
                    title_en: loc.title_en,
                    title_ar: loc.title_ar,
                    title_fr: loc.title_fr || loc.title_en,
                    title_es: loc.title_es || loc.title_en,
                    latitude: parseFloat(loc.latitude),
                    longitude: parseFloat(loc.longitude),
                    instagram: loc.instagram || "#",
                    facebook: loc.facebook || "#",
                    website: loc.website || "#",
                }))
                : [];

            pinSeries.data.setAll(dbLocations);

            pinSeries.bullets.push((root, series, dataItem) => {
                const marker = am5.Picture.new(root, {
                    src: "../assets/marker-brown.svg",
                    width: 26,
                    height: 26,
                    centerX: am5.p50,
                    centerY: am5.p100,
                    cursorOverStyle: "pointer",
                    showTooltipOn: "click",
                });

                marker.adapters.add("tooltipHTML", () => {
                    const lang = window.currentLang || "en";
                    const isRTL = lang === "ar";
                    const titleKey = "title_" + lang;
                    const displayTitle = dataItem.dataContext[titleKey] || dataItem.dataContext.title_en;

                    return `
                        <div class="map-popup" style="direction:${isRTL ? "rtl" : "ltr"}">
                            <h4>${displayTitle}</h4>
                            <div class="branch-social d-flex justify-content-center gap-2">
                                <a href="${dataItem.dataContext.instagram || "#"}" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="${dataItem.dataContext.facebook || "#"}" target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                            <a href="${dataItem.dataContext.website || "#"}" target="_blank" class="branch-btn">
                                ${mapTranslations.visit[lang] || "Visit Website"}
                            </a>
                        </div>
                    `;
                });

                return am5.Bullet.new(root, { sprite: marker });
            });

            chart.appear(1000, 100);

            resizeTimeout = setTimeout(() => {
                if (root && !root.isDisposed()) {
                    root.resize();
                }
            }, 1500);
        } catch (error) {
            console.error("Error creating chart:", error);
        }
    }

    function initMap() {
        if (typeof am5 === "undefined" || typeof am5map === "undefined") {
            setTimeout(initMap, 100);
            return;
        }

        if (chartDiv.offsetWidth === 0 || chartDiv.offsetHeight === 0) {
            setTimeout(createGlobeChart, 100);
            return;
        }

        setTimeout(createGlobeChart, 50);
    }

    window.addEventListener("load", () => {
        if (window.root && !window.root.isDisposed()) {
            setTimeout(() => window.root.resize(), 100);
        }
    });

    window.addEventListener("resize", () => {
        clearTimeout(resizeDebounce);
        resizeDebounce = setTimeout(() => {
            if (window.root && !window.root.isDisposed()) {
                window.root.resize();
            }
        }, 250);
    });

    window.addEventListener("pageshow", (event) => {
        if (!event.persisted) {
            return;
        }

        setTimeout(() => {
            if (window.root && !window.root.isDisposed()) {
                window.root.resize();
            } else {
                initMap();
            }
        }, 100);
    });

    document.addEventListener("languageChanged", (event) => {
        if (!event.detail?.lang) {
            return;
        }

        window.currentLang = event.detail.lang;

        if (window.root && window.root.series && !window.root.isDisposed()) {
            window.root.series.each((series) => {
                if (series instanceof am5map.MapPointSeries) {
                    series.bullets.each((bullet) => {
                        const sprite = bullet.get("sprite");
                        if (sprite) sprite.invalidateTooltip();
                    });
                }
            });
        }
    });

    window.changeMapLanguage = function (lang) {
        if (!mapTranslations.visit[lang]) {
            console.warn(`Language "${lang}" not supported. Available: en, ar, fr, es`);
            return;
        }

        window.currentLang = lang;
        document.dispatchEvent(new CustomEvent("languageChanged", { detail: { lang } }));
    };

    setTimeout(initMap, 100);

    window.addEventListener("beforeunload", () => {
        if (window.root && !window.root.isDisposed()) {
            window.root.dispose();
        }

        clearTimeout(resizeTimeout);
        clearTimeout(resizeDebounce);
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAgentMap, { once: true });
} else {
    initAgentMap();
}
