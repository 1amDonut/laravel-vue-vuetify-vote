export default {
    state: {
        visible: false,
        msg: "",
        snackbar: "",
        color: ""
    },
    getters: {
    },
    mutations: {
        SET_SNACKBAR: (state, payload) => {
            // 設定顯示狀況
            state.visible = true;
            // 顯示訊息
            state.msg = payload.msg;
            // 訊息狀態 ex:success、error
            state.color = payload.status;
        },
        CLOSE_SNACKBAR: (state) => {
            state.visible = false;
        }

    },
    actions: {
        setSnackbar(context, options) {
            context.commit('SET_SNACKBAR', options);
            setTimeout(() => {
                context.commit('CLOSE_SNACKBAR');
            }, 6000);
        }

    }
}