$(function() {
    const modalTrickCover = $("#modal-cover");
    const mediaCoverSelect = $("#trick_form_mediaCover");
    const mediasListWrapper = $("#medias-list-wrapper");

    $(mediaCoverSelect).change(function (){
        $("#media-preview").attr('src', '/images/tricks/thumbnails/' + $("option:selected", this).text());
    });

    $("#modal-cover-cancel").click(function(){
        let currentImg = $("#trick-cover").attr('src').split('/').pop();
        $("option", mediaCoverSelect).each(function() { this.selected = (this.text === currentImg); });
        $(mediaCoverSelect).trigger('change');
    });

    $("#modal-cover-save").click(function(){
        $("#trick-cover").attr('src', '/images/tricks/' + $("option:selected", mediaCoverSelect).text());
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

    $("a.delete-trick-button").click(function(){
        let url = $(this).data('url');
        $("#modal-delete-confirm").prop('href', url);
    })

    $(mediaCoverSelect).trigger('change');


    $("#more-comments-btn").click(function(){
        let page = $(this).data("page");
        let slug = $(this).data("slug");
        let self = this;
        $("#loading-spinner").show();
        $.ajax('/more-comments/' + slug + '/' + page,
            {
                dataType: 'json',
                success: function (data) {
                    $.each(data.comments, function(index, comment){
                        $("#comments-list").append(`
                        <div class="d-flex comment-item">
                            <img class="rounded-circle comment-avatar" src="/images/avatar_placeholder.png" alt="avatar"/>
                            <div class="row text-end d-flex">
                                <div class="col-xl-12 d-flex align-items-center0">
                                    <h4 class="comment-author text-start">${comment.user.firstName + ' ' + comment.user.lastName}</h4>
                                    <span class="font-monospace comment-date">
                                        ${new Intl.DateTimeFormat('en-US', { dateStyle: 'long'}).format(new Date(comment.creationDate))}
                                    </span>
                                </div>
                                <div class="col-xl-11 col-xxl-12 text-break text-start d-flex align-items-xxl-center">
                                    <p class="text-break text-start comment-content">
                                        ${comment.content}
                                    </p>
                                </div>
                            </div>
                        </div>`)
                    })
                    if (data.numberOfCommentsReturned < 5) {
                        $(self).prop('disabled', 'true');
                        $(self).text('No more comments to show');
                        $(self).data('page', -1);
                    } else {
                        $(self).data('page', page + 1);
                    }
                },
                error: function () {
                    $("#more-comments-alert").show();
                    $(self).prop('disabled', 'true');
                },
                complete: function() {
                    $("#loading-spinner").hide();
                }
            });
    });

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
