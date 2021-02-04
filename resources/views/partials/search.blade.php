<form action="{{ route('products.search') }}" class="d-flex mr-1">
<div class="form-group mb-0 mr-4">
<input type="text" name="q" class="form-control" placeholder="produit ou categorie">
</div>

<button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>Chercher</button>

</form>