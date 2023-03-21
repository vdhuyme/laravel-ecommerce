<div>
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Liên hệ với chúng tôi</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>Liên hệ với chúng tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Contact Us Area Start Here -->
    <div class="contact-us-area">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-custom">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="ion-ios-location-outline"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>Địa điểm của chúng tôi</h4>
                            <p>Cty Thương mại và dịch vụ VFRUITS / Quận Ninh Kiều, TP Cần Thơ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-custom">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="ion-iphone"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>Liên hệ với chúng tôi bất cứ lúc nào</h4>
                            <p>SĐT: 096 278 5101</p><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-custom text-align-center">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="ion-ios-email-outline"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>Hỗ trợ</h4>
                            <p>Hổ trợ 24/7 <br> huyb1909921@student.ctu.edu.vn</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-custom">
                    <form class="contact-form" wire:submit.prevent="contactUs">
                        <div class="comment-box mt-5">
                            <h5 class="text-uppercase">LIÊN LẠC</h5>
                            <div class="row mt-3">
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input wire:model="fullName" class="border rounded-0 w-100 input-area name"
                                            type="text" placeholder="Họ và tên">
                                        @error('fullName')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input wire:model="email" class="border rounded-0 w-100 input-area email"
                                            type="email" placeholder="Email">
                                        @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <input wire:model="subject" class="border rounded-0 w-100 input-area email"
                                            type="text" name="con_content" id="con_content" placeholder="Vấn đề">
                                        @error('subject')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <textarea wire:model="message" cols="30" rows="5"
                                            class="border rounded-0 w-100 custom-textarea input-area"
                                            placeholder="Lời nhắn"></textarea>
                                        @error('message')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-custom mt-40">
                                    <button type="submit" id="submit" name="submit"
                                        class="btn obrien-button primary-btn rounded-0 mb-0">Gửi đi</button>
                                </div>
                                <div>
                                    <div wire:loading wire:target="contactUs"
                                        class="spinner-border text-success spinner-border-sm" role="status">
                                    </div>
                                    <div wire:loading wire:target="contactUs">
                                        Đang xử lý...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us Area End Here -->