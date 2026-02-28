document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("contactForm");
    if (!form) return;

    const inputs = form.querySelectorAll("input, textarea");
    const businessEmail = "info@beeandhoney.com";

    /* =========================
       Validation Functions
    ==========================*/

    function showError(input, type) {
        const error = input.nextElementSibling;
        input.classList.add("error");

        const key = type === "required"
            ? `data-required-${window.currentLang || "ar"}`
            : `data-error-${window.currentLang || "ar"}`;

        error.innerText = input.getAttribute(key) || "Invalid";
        error.style.display = "block";
    }

    function clearError(input) {
        const error = input.nextElementSibling;
        input.classList.remove("error");
        error.innerText = "";
        error.style.display = "none";
    }

    /* =========================
       Live Validation
    ==========================*/

    inputs.forEach(input => {
        input.addEventListener("input", () => {

            if (input.value.trim() === "") {
                showError(input, "required");
            }
            else if (input.dataset.regex) {
                const regex = new RegExp(input.dataset.regex);
                if (!regex.test(input.value.trim())) {
                    showError(input, "error");
                } else {
                    clearError(input);
                }
            }
            else {
                clearError(input);
            }

        });
    });

    /* =========================
       Submit
    ==========================*/

    form.addEventListener("submit", (e) => {

        e.preventDefault();
        let isValid = true;

        inputs.forEach(input => {

            if (input.value.trim() === "") {
                showError(input, "required");
                isValid = false;
            }
            else if (input.dataset.regex) {
                const regex = new RegExp(input.dataset.regex);
                if (!regex.test(input.value.trim())) {
                    showError(input, "error");
                    isValid = false;
                }
            }

        });

        if (!isValid) return;

        /* =========================
           تجهيز رسالة الإيميل
        ==========================*/

        const name = document.getElementById("name").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const email = document.getElementById("email").value.trim();
        const subjectInput = document.getElementById("subject").value.trim();
        const message = document.getElementById("message").value.trim();

        const subject = encodeURIComponent(`New Message From: ${name}`);

        const body = encodeURIComponent(
            `Name: ${name}\n` +
            `Email: ${email}\n` +
            `Phone: ${phone}\n\n` +
            `Subject: ${subjectInput}\n\n` +
            `Message:\n${message}`
        );

        const gmailURL = `https://mail.google.com/mail/?view=cm&fs=1&to=${businessEmail}&su=${subject}&body=${body}`;

        window.open(gmailURL, "_blank");


        const title = document.body.getAttribute(`data-success-title-${window.currentLang || "ar"}`) || "Success";
        const text = document.body.getAttribute(`data-success-text-${window.currentLang || "ar"}`) || "Your message is ready to send!";

        Swal.fire({
            icon: "success",
            title: title,
            text: text,
            confirmButtonColor: "#c89b3c"
        });

        form.reset();
        inputs.forEach(clearError);

    });

});

