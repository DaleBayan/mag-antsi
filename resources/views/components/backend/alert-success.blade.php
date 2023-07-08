@if(session()->has('message')) 
    <div
    x-data="{show: true}" 
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition:leave.opacity.scale.50.duration.500ms
    class="position-absolute start-50 py-1 px-3 border border-2 border-success text-success rounded" role="alert">
    <i class="fa-solid fa-circle-check text-success me-2"></i>
    <b>{{session('message')}}</b>
    </div>
@endif
