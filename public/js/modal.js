/**
 * Created by martin.skarbala on 5/9/2017.
 */
$('#confirmVacation').on('show.bs.modal', function (e) {

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirmVacation').data('form', form);
});
<!-- Form confirm (yes/ok) handler, submits form -->
$('#confirmVacation').find('.modal-footer #confirmVacation').on('click', function () {
    $(this).data('form').submit();
});
$('#confirmDecline').on('show.bs.modal', function (e) {
    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirmDecline').data('form', form);
});

<!-- Form confirm (yes/ok) handler, submits form -->
$('#confirmDecline').find('.modal-footer #confirmDecline').on('click', function () {
    $(this).data('form').submit();
});

$('#confirmCancel').on('show.bs.modal', function (e) {

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirmCancel').data('form', form);
});
<!-- Form confirm (yes/ok) handler, submits form -->
$('#confirmCancel').find('.modal-footer #confirmCancel').on('click', function () {
    $(this).data('form').submit();
});