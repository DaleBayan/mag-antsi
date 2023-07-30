@if(session()->has('message')) 
    <div class="p-5 w-100 fixed-bottom d-flex justify-content-end z-n1">
        <div
        x-data="{show: true}" 
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition:leave.opacity.scale.50.duration.500ms
        class="py-1 px-2 bg-success text-light rounded shadow" role="alert">
            <b>
                <i class="fa-solid fa-circle-check me-2"></i>{{session('message')}}
            </b>
        </div>
    </div>
@endif
