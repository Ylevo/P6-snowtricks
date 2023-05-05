$(function() {
    const modalTrickCover = $("#modal-cover");
    const mediaCoverSelect = $("#trick_form_mediaCover");
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

    $("#new-image-media-btn").click(function(){
        addMediaUsingPrototype('image');
    });

    $("#new-video-media-btn").click(function(){
        addMediaUsingPrototype('video');
    });

    $(mediasListWrapper).on('click', '.remove-media-entry', function(e) {
        e.preventDefault();
        $(this).closest(".media-entry").fadeOut().remove();
    });

    $(mediaCoverSelect).trigger('change');

    function addMediaUsingPrototype(prototypeName)
    {
        const prototype = $(mediasListWrapper).data(prototypeName + '-prototype');
        const index = $(mediasListWrapper).data(prototypeName + '-index');
        const newMedia = prototype.replace(/__name__/g, index);
        $(mediasListWrapper).data(prototypeName + '-index', index + 1);
        $(mediasListWrapper).append(newMedia);
        $(mediasListWrapper).stop().animate({scrollTop: mediasListWrapper[0].scrollHeight}, 800);
    }

});
