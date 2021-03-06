(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_modal_js"],{

/***/ "./resources/js/modal.js":
/*!*******************************!*\
  !*** ./resources/js/modal.js ***!
  \*******************************/
/***/ (() => {

var addressModal = $('#addressModal');
var deleteModal = $('#deleteModal');
addressModal.on('show.bs.modal', function (e) {
  var target, form;
  target = e.relatedTarget.getAttribute('data-target');
  form = $('#addressModal form');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  getCountry();
  form.attr('action', target);
  $.ajax({
    type: 'GET',
    url: target,
    dataType: 'json'
  }).done(function (_ref) {
    var data = _ref.data;

    if (!data) {
      return;
    }

    form.find('#inputType').val('PUT');
    addressModal.find('.btn-danger').attr('data-target', target).removeClass('d-none');
    getCity(data.country_name);
    $('#inputAddressName').val(data.name);
    $('#inputAddress').val(data.address);
    $('#inputCountry').val(data.country_name);
    $('#inputCity').val(data.city_name);
    $('#inputPostCode').val(data.post_code);
  });
});
addressModal.on('hide.bs.modal', function (e) {
  addressModal.find('input').val('');
  addressModal.find('form').removeAttr('action');
  addressModal.find('#inputType').val('POST');
  addressModal.find('.alert').remove();
});
$('#inputCountry').on('change', function () {
  getCity($(this).val());
});
$('#saveAddress').on('click', function () {
  var form;
  form = $('#addressModal form');
  addressModal.find('.alert').remove();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: 'POST',
    url: form.attr('action'),
    data: form.serialize(),
    dataType: 'json'
  }).done(function (msg) {
    addressModal.find('.btn.btn-secondary').trigger('click');
  }).fail(function (_ref2, textStatus) {
    var responseJSON = _ref2.responseJSON;
    var err_row = '';
    $.each(responseJSON.errors, function (i, item) {
      err_row += '<li>' + item + '</li>';
    });
    addressModal.find('.modal-body').prepend('<div class="alert alert-danger"><ul class="mb-0">' + err_row + '</ul></div>');
  });
});

function getCountry() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: 'GET',
    url: '/get-countries',
    dataType: 'json'
  }).done(function (_ref3) {
    var data = _ref3.data;
    $.each(data, function (i, item) {
      $('#inputCountry').append('<option value="' + item.id + '">' + item.name + '</option>');
    });
  });
}

function getCity(countryId) {
  $.ajax({
    type: 'GET',
    url: '/get-country/' + countryId,
    dataType: 'json'
  }).done(function (_ref4) {
    var data = _ref4.data;
    $.each(data, function (i, item) {
      $('#inputCity').append('<option value="' + item.id + '">' + item.name + '</option>');
    });
  });
}

$('#btnDelete').on('click', function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: 'POST',
    url: $(this).attr('data-target'),
    data: {
      '_method': 'DELETE'
    },
    dataType: 'json'
  }).done(function () {
    window.location.reload();
  });
});
deleteModal.on('show.bs.modal', function (e) {
  var target;
  target = e.relatedTarget.getAttribute('data-target');
  $('#btnDelete').attr('data-target', target);
});

/***/ })

}]);