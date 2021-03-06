<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ $modal['title'] }}</h4>
      </div>
      <div  id='modal_body' class="modal-body">

        {{ $modal['body'] }}

        @forelse ($modal['inputs'] as $name => $type)
            <br>
            <input class="form-control" type={{ $type }} name={{ $name }} value="">
        @empty

        @endforelse
      </div>
      <div class="modal-footer">
        <button data-button='dismiss' type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button data-button='submit' type="submit" name="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>

  </div>
</div>
