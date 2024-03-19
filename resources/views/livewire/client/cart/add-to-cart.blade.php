<div class="pro-details-quality">
    <div class="cart-plus-minus">
        <div
                wire:click="decrease"
                class="dec qtybutton">{{ __('-') }}</div>

        <input
                id="quantity"
                wire:model.live="quantity"
                class="cart-plus-minus-box"
                type="text"
                readonly />

        <div
                wire:click="increase"
                class="inc qtybutton">{{ __('+') }}</div>
    </div>

    <div
            wire:click="addToCart"
            class="pro-details-cart btn-hover">
        <a>{{ __('Thêm vào giỏ') }}</a>
    </div>

    <div class="pro-details-compare">
        <a href="#"><i class="pe-7s-shuffle"></i></a>
    </div>
</div>
