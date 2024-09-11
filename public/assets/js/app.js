$("#image_upload_input").on("change", function (e) {
    let image = e.target.files[0];
    $("#image_upload").attr("src", URL.createObjectURL(image));
});

function countWord() {
    // Get the input text value
    let words = document.getElementById("description").value;
    // Initialize the word counter
    let count = 0;

    // Split the words on each
    // space character
    let split = words.split(" ");

    // Loop through the words and
    // increase the counter when
    // each split word is not empty
    for (let i = 0; i < split.length; i++) {
        if (split[i] !== "") {
            count += 1;
        }
    }

    // Display it as output
    document.getElementById("show").innerHTML = count;
    document.getElementById("char_count").innerHTML = words.length;
}
