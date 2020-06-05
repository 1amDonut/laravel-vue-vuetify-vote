import voteServices from "../../services/vote.services"
export default {
     state: {
          activity: [{}],
          ActivityDetail: {}
     }, getters: {

     },
     mutations: {
          SET_ACTIVITY(state, payload) {
               state.activity = payload.data;
          },
          SET_ACTIVITY_DETAIL(state, payload) {
               state.ActivityDetail = payload.data;
          }
     }, actions: {
          GET_ACTIVITY(context) {
               voteServices.getAll().then(data => {
                    context.commit("SET_ACTIVITY", data);
               }).catch(error => {
                    console.log(error);
               })
          },
          GET_ACTIVITY_DETAIL(context, payload) {
               let $obj = {
                    "vote_id": payload
               };
               voteServices.getDetail($obj).then(data => {
                    context.commit("SET_ACTIVITY_DETAIL", data);
               }).catch(error => {
                    console.log(error);
               })
          }
     }
}