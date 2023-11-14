$(document).ready(function () {
    function handleReviewClick(e) {
        e.preventDefault();
        const form = $(this);
        const targetId = form.attr('id');

        $.ajax({
            type: "POST",
            url: '/../review',
            data: form.serialize(),
            success: function (response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success === 1 || jsonData.success === 2) {
                    const qtyValue = jsonData.likes || jsonData.dislikes;
                    form.find('button').html((targetId === 'review' ? 'Like ' : 'Dislike ') + qtyValue);
                    alert('Oddano głos!');
                } else if (jsonData.success === 0) {
                    alert('Wystąpił błąd!');
                }
            },
            error: function () {
                alert('Wystąpił błąd!');
            }
        });
    }

    $('#review, #review2').click(handleReviewClick);
});