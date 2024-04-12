import axios from "axios";

const state = {
  user: null,
  posts: null,
};

const getters = {
  isAuthenticated: (state) => !!state.user,
  StateUser: (state) => state.user,
};

const actions = {
  async Register({dispatch}, form) {
    await axios.post('register', form)
    let UserForm = new FormData()
    UserForm.append('username', form.username)
    UserForm.append('password', form.password)
    await dispatch('LogIn', UserForm)
  },

  async LogIn({commit}, user) {
    await axios.post("login", user);
    await commit("setUser", user.get("name"));
  },

  async LogOut({ commit }) {
    let user = null;
    commit("logout", user);
  },
};

const mutations = {
  setUser(state, name) {
    console.log('state',state,'name',name);
    state.user = name;
  },
  logout(state, user) {
    state.user = user;
  },
};



export default {
  state,
  getters,
  actions,
  mutations,
};