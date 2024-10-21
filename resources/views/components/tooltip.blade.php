@props(['tooltipMsg'])

@if($tooltipMsg)
    <div class="relative">
        {{ $slot }}
        <div id="toolTip" class="absolute -top-9 left-1/2 -translate-x-1/2 z-10 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">{{ $tooltipMsg }}</div>
    </div>
@endif
