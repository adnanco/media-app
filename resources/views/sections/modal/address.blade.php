<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Adres Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" method="post">
                    <input type="hidden" name="_method" value="POST" id="inputType">
                    <div class="col-md-6">
                        <label for="inputAddressName" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="inputAddressName" name="name">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="inputAddress" name="address"
                               placeholder="1234 Main St">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCountry" class="form-label">Ülke</label>
                        <select id="inputCountry" name="countryname" class="form-select">
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">Şehir</label>
                        <select id="inputCity" name="cityname" class="form-select">
                            <option selected>Seçiniz...</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Posta Kodu</label>
                        <input type="text" class="form-control" id="inputPostCode" name="postcode">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger d-none" data-bs-toggle="modal" data-bs-target="#deleteModal">Adresi Sil</button>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-primary" id="saveAddress">Kaydet</button>
            </div>
        </div>
    </div>
</div>
