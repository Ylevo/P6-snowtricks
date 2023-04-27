$(function() {
    const modalTrickCover = $("#modal-cover");
    const mediaCoverSelect = $("#trick_form_mediaCover");
    const newImageBtn = $("#new-image-media-btn");
    const mediasListWrapper = $("#medias-list-wrapper");

    $(mediaCoverSelect).change(function (){
        $("#media-preview").attr('src', 'images/tricks/thumbnails/' + $("option:selected", this).text());
    });

    $("#modal-cover-cancel").click(function(){
        let currentImg = $("#trick-cover").attr('src').split('/').pop();
        $("option", mediaCoverSelect).each(function() { this.selected = (this.text === currentImg); });
        $(mediaCoverSelect).trigger('change');
    });

    $("#modal-cover-save").click(function(){
        $("#trick-cover").attr('src', 'images/tricks/' + $("option:selected", mediaCoverSelect).text());
        $(modalTrickCover).modal('hide');
    });

    $(newImageBtn).click(function(){
        const prototype = $(mediasListWrapper).data('image-prototype');
        const index = $(mediasListWrapper).data('image-index');
        const newImage = prototype.replace(/__name__/g, index);
        $(mediasListWrapper).data('image-index', index + 1);
        $(mediasListWrapper).append(newImage);
        $(mediasListWrapper).stop().animate({scrollTop: mediasListWrapper[0].scrollHeight}, 800);
    });

    $(mediasListWrapper).on('click', '.remove-media-entry', function(e) {
        e.preventDefault();
        $(this).closest(".media-entry").fadeOut().remove();
    });

    $(mediaCoverSelect).trigger('change');

});
