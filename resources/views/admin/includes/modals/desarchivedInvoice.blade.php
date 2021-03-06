<div class="modal fade" id="Desarchived_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('admin/invoices.desarchived')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.invoices.desarchive') }}" method="post" >
                    {{ csrf_field() }}
                    <input type="hidden" name="id_page" value="2">
                    <input type="hidden" name="uuid" id="uuid" value="">
                    <div class="form-group row">
                        <label for="employe" class="col-sm-12 col-form-label">
                            Etes-vous sur de désarchiver cette facture ?
                        </label>
                           
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-warning" id="submit"><i class="fa fa-exchange"></i> Archiver</button>
            </div>
            </form>
        </div>
    </div>
</div>
