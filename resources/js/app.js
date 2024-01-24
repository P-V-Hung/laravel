import './bootstrap.js';

Echo.private('friend.change.'+ userId)
    .listen('StatusChangeFriend', (e) => {
        let message,type;
        if(e.status === 0){
            message = e.fromName+" đã gửi cho bạn một lời mời kết bạn";
            type = "info";
        }else{
            message = e.fromName+" đã chấp nhận lời mời kết bạn của bạn!";
            type = "success";
        }

        let content = `
            <div class="notification d-none ${type} bg-white d-lg-flex align-items-center justify-content-between position-fixed">
                <div class="icon-stick ps-1 d-flex justify-content-center">
                    <i class="btn-round-md feather-bell font-md"></i>
                </div>
                <div class="notification-body">
                    <h4 class="pt-3 fw-600 fs-4">Thông báo</h4>
                    <p class="fs-5">${message}</p>
                </div>
                <div class="icon-close cursor-pointer px-3">
                    <i class="ti-close fs-5 text-grey-900 mt-2 d-inline-block"></i>
                </div>
            </div>
        `;
        $("#log").html(content);
    });
