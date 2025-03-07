$(document).ready(function () {
    // Chatbot functionality
    $("#send-message").click(function () {
        let userMessage = $("#user-input").val();
        if (userMessage.trim() !== "") {
            $("#messages").append(`<p><strong>You:</strong> ${userMessage}</p>`);
            $("#user-input").val("");

            // Simple bot response
            setTimeout(() => {
                $("#messages").append(`<p><strong>Bot:</strong> This is a sample response!</p>`);
                $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
            }, 1000);
        }
    });

    // AI Quiz Maker (Mockup)
    $("#generate-quiz").click(function () {
        $("#quiz-container").html(`
            <h4>Sample Quiz</h4>
            <p>1. What is 2 + 2?</p>
            <input type="radio" name="q1" value="3"> 3<br>
            <input type="radio" name="q1" value="4"> 4<br>
            <input type="radio" name="q1" value="5"> 5<br>
            <button id="submit-quiz">Submit</button>
        `);

        $("#submit-quiz").click(function () {
            alert("Quiz submitted!");
        });
    });

    // Edit Profile
    $("#edit-profile").click(function () {
        $("#profile-form").toggle();
    });

    $("#profile-form").submit(function (e) {
        e.preventDefault();
        let name = $("#name").val();
        let email = $("#email").val();

        if (name && email) {
            $("p:contains('Name')").text(`Name: ${name}`);
            $("p:contains('Email')").text(`Email: ${email}`);
            $("#profile-form").hide();
        }
    });
});
