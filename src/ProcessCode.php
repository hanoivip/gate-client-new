<?php

namespace Hanoivip\GateClientNew;

interface ProcessCode
{
    // Lỗi liên quan tới thẻ
    const NOT_PROCESSED = 0;
    const VALID_CARD = 1;           // Thẻ đúng
    const DELAY_CARD = 2;           // Thẻ đúng, nhưng mà cần thời gian thêm để biết giá trị
    const INVALID_CARD = 3;         // Thẻ không hợp lệ (có thể bị khoá, có thể hết hạn sử dụng,...)
    const INVALID_SERI = 4;         // Seri thẻ sai
    const INVALID_PASS = 5;         // Mã thẻ sai
    const USED_CARD = 6;            // Thẻ đã bị sử dụng trước đó (ở nơi khác)
    const SUBMITED_CARD = 7;        // Thẻ đã gửi lên hệ thống, đã xử lý không xử lý lại
    const INVALID_TYPE = 8;         // Loại thẻ sai
    
    // Lỗi liên nhà cung cấp
    const MAINTAIN = 9;             // Bảo trì (có thể có lỗi đang xẩy ra, hoặc các kênh phía sau bị bảo trì)
    const INVALID_CAPTCHA = 11;     // Captcha sai
    const RETRY_CARD = 12;          // Thẻ chưa gạch được, thử lại sau.
    
    // Liên quan tới cổng
    const CLIENT_BOGUS = 10;        // Thông số kết nối tới sai
    const SYSTEM_BUSY = 13;         // Cổng đang bận, đợi 1 chút
    const SYSTEM_MAINTAIN = 14;     // Cổng đang chủ động bảo trì
    const SYSTEM_ERROR = 99;        // Có lỗi trong cổng

}