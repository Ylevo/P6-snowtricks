$(function() {
    $("#more-tricks-btn").click(function(){
        let page = $(this).data("page");
        let self = this;
        $("#loading-spinner").show();
        $.ajax('/more-tricks/' + page,
            {
                dataType: 'json',
                success: function (data) {
                    let isLoggedIn = data.isLoggedIn;
                    $.each(data.tricks, function(index, trick){
                        $("#tricks-list").append(`
                        <div class="col">
                            <div class="card">
                                <a href="/trick/${trick.slug}">
                                    <img class="card-img-top w-100 d-block fit-cover trick_list_img" 
                                    alt="${trick.mediaCover.altText}"
                                    src="/images/tricks/${trick.mediaCover.url}">
                                </a>
                                <div class="card-body">
                                    <p class="text-primary d-flex justify-content-around align-items-center card-text mb-0">
                                        <a href="/trick/${trick.slug}">${trick.name}</a>
                                        ${isLoggedIn ? getIconsElements(trick) : ''}
                                    </p>
                                </div>
                            </div>
                         </div>`)
                    })
                    if (data.numberOfTricksReturned < 10) {
                        $(self).prop('disabled', 'true');
                        $(self).text('No more tricks to show');
                        $(self).data('page', -1);
                    } else {
                        $(self).data('page', page + 1);
                    }
                },
                error: function () {
                    $("#more-tricks-alert").show();
                    $(self).prop('disabled', 'true');
                },
                complete: function() {
                    $("#loading-spinner").hide();
                }
            });
    });

    function getIconsElements(trick) {
        return `<span class="d-flex gap-2">
                    <a href="/edit-trick/${trick.slug}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a class="delete-trick-button" href="#" 
                        data-bs-target="#modal-delete"
                        data-bs-toggle="modal"
                        data-url="/delete-trick/${trick.slug}">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </span>`
    }
});