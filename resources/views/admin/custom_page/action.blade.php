<div class="dropdown">
  <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false" title="{{ __('Action') }}"><i
          class="feather icon-more-vertical-"></i></button>
  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
    @can('pages.edit')
    <a href="{{route('custom_page.edit', $id)}}" class="dropdown-item" title="{{ __('Edit') }}"><i class="feather icon-edit mr-2"></i>{{ __("Edit") }}</a>
    @endcan
    @can('pages.delete')
    <button type="button" class="dropdown-item btn btn-link" data-toggle="modal" data-target="#deleteModal{{$id}}" title="{{ __('Delete') }}"><i class="feather icon-delete mr-2"></i>{{ __("Delete") }} </button>
    @endcan
  </div>
</div>
<!-- Modal -->
<div id="deleteModal{{$id}}" class="delete-modal modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close"
                  data-dismiss="modal" title="{{ __('Close') }}">&times;</button>
              <div class="delete-icon"></div>
          </div>
          <div class="modal-body text-center">
              <h4 class="modal-heading">{{__('Are You Sure ?')}}</h4>
              <p>{{__('Do you really want to delete selected item names here? This
                  process
                  cannot be undone.')}}</p>
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{route("custom-page.destroy", $id)}}">
              @csrf
              <input type="hidden" name="modulename" value="{{ $title }}">
              <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                  <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
            </form>
          </div>
      </div>
  </div>
</div>
<!-- Model ended -->