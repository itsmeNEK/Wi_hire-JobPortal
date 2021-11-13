function display(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(event) {
            $("#avatarPicturePreview").attr("src", event.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#avatar-picture").change(function() {
    display(this);
});