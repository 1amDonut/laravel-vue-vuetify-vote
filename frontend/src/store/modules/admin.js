import adminServices from "../../services/admin.services";
export default{
    state:{
        classify:{}
    },
    getters:{

    },
    mutations:{
        SET_CLASSIFY:(state,payload)=>{
            state.classify = payload;
        }
    },
    actions:{
        GET_CLASSIFY(context){
            adminServices
            .getClassify()
            .then(data=>{
                context.commit("SET_CLASSIFY",data);
            });
        }
    }
}