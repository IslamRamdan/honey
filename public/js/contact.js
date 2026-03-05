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

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = window.currentLang === 'ar' ? 'جاري الإرسال...' : 'Sending...';

        const payload = {
            name: name,
            email: email,
            phone: phone,
            subject: subjectInput,
            message: message
        };

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/contact/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        })
            .then(response => response.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;

                if (data.success) {
                    const title = document.body.getAttribute(`data-success-title-${window.currentLang || "ar"}`) || "Success";
                    const text = document.body.getAttribute(`data-success-text-${window.currentLang || "ar"}`) || "Your message has been sent successfully.";

                    Swal.fire({
                        icon: "success",
                        title: title,
                        text: text,
                        confirmButtonColor: "#c89b3c"
                    });

                    form.reset();
                    inputs.forEach(clearError);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: window.currentLang === 'ar' ? "خطأ" : "Error",
                        text: data.message || "Failed to send message.",
                        confirmButtonColor: "#c89b3c"
                    });
                }
            })
            .catch(error => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                Swal.fire({
                    icon: "error",
                    title: window.currentLang === 'ar' ? "خطأ" : "Error",
                    text: "An error occurred while sending your message. Please try again.",
                    confirmButtonColor: "#c89b3c"
                });
                console.error("Error:", error);
            });

    });

});

