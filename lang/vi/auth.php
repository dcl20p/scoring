<?php

declare(strict_types=1);

return [
    // Notification
    'failed'   => 'Thông tin tài khoản không tìm thấy trong hệ thống.',
    'throttle' => 'Vượt quá số lần đăng nhập cho phép. Vui lòng thử lại sau :seconds giây.',
    
    // Application name
    'title' => 'AssessCrafter',
    'subtitle' => 'Nền tảng đánh giá & chấm điểm',
    'welcome_back' => 'Chào mừng trở lại',
    'login_prompt' => 'Nhập thông tin đăng nhập để truy cập tài khoản của bạn',
    'role_teacher' => 'Giáo viên',
    'role_admin' => 'Quản trị viên',
    'email' => 'Email',
    'password' => 'Mật khẩu',
    'forgot_password' => 'Quên mật khẩu?',
    'login_button_teacher' => 'Đăng nhập với tư cách Giáo viên',
    'login_button_admin' => 'Đăng nhập với tư cách Quản trị viên',
    'login_button' => 'Đăng nhập',
    'no_account' => 'Chưa có tài khoản?',
    'create_account' => 'Tạo tài khoản',
    'remember_me' => 'Nhớ đăng nhập',

    // Register page
    'create_account_title' => 'Tạo tài khoản',
    'create_prompt' => 'Nhập thông tin của bạn để bắt đầu',
    'first_name' => 'Tên',
    'last_name' => 'Họ',
    'confirm_password' => 'Xác nhận mật khẩu',
    'admin_code' => 'Mã đăng ký Quản trị viên',
    'admin_code_prompt' => 'Nhập mã đăng ký quản trị viên',
    'admin_code_help' => 'Đăng ký tài khoản yêu cầu mã đặc biệt được cung cấp bởi quản trị hệ thống',
    'register_button_teacher' => 'Đăng ký với vai trò Giáo viên',
    'register_button_admin' => 'Đăng ký với vai trò Quản trị viên',
    'already_have_account' => 'Đã có tài khoản?',
    'sign_in' => 'Đăng nhập',
    'phone' => 'Số điện thoại',
    'loading_register' => 'Đang tạo tài khoản...',
    
    // Password requirements
    'password_min_length' => 'Ít nhất 8 ký tự',
    'password_uppercase' => 'Có chứa chữ hoa',
    'password_lowercase' => 'Có chứa chữ thường',
    'password_mixedcase' => 'Có chứa chữ thường và chữ in hoa',
    'password_number' => 'Có chứa số',
    'password_symbol' => 'Có chứa ký tự đặc biệt',

    // Flash Messages
    'registration_success' => 'Tài khoản của bạn đã được tạo thành công!',
    'registration_failed' => 'Đã xảy ra lỗi khi tạo tài khoản.',
    'login_success' => 'Bạn đã đăng nhập thành công!',
    'logout_success' => 'Bạn đã đăng xuất thành công!',
    'reset_success' => 'Mật khẩu của bạn đã được đặt lại thành công!',
    'reset_error' => 'Đã xảy ra lỗi khi đặt lại mật khẩu.',
    
    // Terms and policy
    'terms_agreement' => 'Bằng cách tạo tài khoản, bạn đồng ý với',
    'terms_of_service' => 'Điều khoản dịch vụ',
    'and' => 'và',
    'privacy_policy' => 'Chính sách bảo mật',

    // Super Admin Registration
    'register_school_title' => 'Đăng ký trường học của bạn',
    'create_super_admin_prompt' => 'Tạo tài khoản quản trị viên cấp cao cho trường học của bạn',
    'admin_information' => 'Thông tin quản trị viên',
    'school_information' => 'Thông tin trường học',
    'school_name' => 'Tên trường',
    'school_email' => 'Email trường học',
    'school_email_help' => 'Email này sẽ được sử dụng làm địa chỉ liên hệ chính cho trường của bạn',
    'school_type' => 'Loại trường',
    'select_school_type' => 'Chọn loại trường',
    'select_school_' => 'Trường học',
    'school_type_normal' => 'Trường phổ thông',
    'school_type_university' => 'Đại học',
    'school_type_college' => 'Cao đẳng',
    'school_type_vocational' => 'Trường dạy nghề',
    'school_type_other' => 'Khác',
    'city' => 'Thành phố',
    'province' => 'Tỉnh/Thành phố',
    'district' => 'Quận/Huyện', 
    'country' => 'Quốc gia',
    'website' => 'Website (Tùy chọn)',
    'register_school_button' => 'Đăng ký trường học',
    'registering_school' => 'Đang đăng ký trường học...',
    'enter_school' => 'Nhập thông tin trường học của bạn',

    // Send mail
    'verify_email_subject' => 'Xác thực địa chỉ email',
    'verify_email_title' => 'Xác thực địa chỉ email của bạn',
    'verify_email_description' => 'Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, vui lòng xác thực địa chỉ email của bạn bằng cách nhấp vào liên kết chúng tôi vừa gửi.',
    'verify_email_line1' => 'Vui lòng nhấp vào nút bên dưới để xác thực địa chỉ email của bạn.',
    'verify_email_line2' => 'Nếu bạn không tạo tài khoản, bạn có thể bỏ qua email này.',
    'verify_email_button' => 'Xác thực địa chỉ email',
    'verification_link_sent' => 'Một liên kết xác thực mới đã được gửi đến địa chỉ email của bạn.',
    'email_verified' => 'Email của bạn đã được xác thực!',
    'resend_verification_email' => 'Gửi lại email xác thực',
];
