document.getElementById("signupForm").addEventListener("submit", function (e) {

    const firstName = document.getElementById("firstName").value.trim();
    const surname = document.getElementById("surname").value.trim();
    const dob = document.getElementById("dob").value;
    const email = document.getElementById("email").value.trim();

    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    const genderMale = document.getElementById("male").checked;
    const genderFemale = document.getElementById("female").checked;

    
    const nameRegex = /^[A-Za-z ]+$/;

    if (!nameRegex.test(firstName)) {
        alert("First name contain letters only.");
        e.preventDefault();
        return;
    }

    if (!nameRegex.test(surname)) {
        alert("Surname contain letters only.");
        e.preventDefault();
        return;
    }

    if (!dob) {
        alert("Please select your date of birth.");
        e.preventDefault();
        return;
    }

    if (!genderMale && !genderFemale) {
        alert("Please select your gender.");
        e.preventDefault();
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        e.preventDefault();
        return;
    }

    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,}$/;

    if (!passwordRegex.test(password)) {
        alert("Password must be atleast 6 characters and include numbers and include letters.");
        e.preventDefault();
        return;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        e.preventDefault();
        return;
    }
});