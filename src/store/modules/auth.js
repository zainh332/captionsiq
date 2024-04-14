import axios from "axios";

const state = {
  user: [],
  posts: null,
};

const getters = {
  isAuthenticated: (state) => !!state.user,
  StateUser: (state) => state.user,
};

const actions = {
  async Register({ dispatch }, form) {
    await axios.post('register', form);
    await dispatch('LogIn', form); // Pass the entire form object
  },

  async LogIn({ commit }, user) {
    try{
        const response = await axios.post("login", user);
        if (response && response.status == 200) {
          const user_data = response.data.data; // Assuming the name is returned in the response
          commit("setUser", user_data); // Pass the name to the mutation
        } else {
          // Handle the case when the response or required data is missing
          commit("setUser", null);
          throw new Error("Invalid Credentials");
        }
    
    }
    catch(error)
    {
        throw error;
    }
   
  },
  async updateProfile({ commit }, user) {
    try{
        // const response = await axios.post("profile", user);
        // if (response && response.status == 200) {
        //   const user_data = response.data.data; // Assuming the name is returned in the response
        //    // Pass the name to the mutation
        // } else {
        //   // Handle the case when the response or required data is missing
        //   commit("setUser", null);
        //   throw new Error("Invalid Credentials");
        // }
        console.log(user);
        commit("setUser", user.data.data);
    
    }
    catch(error)
    {
        throw error;
    }
   
  },

  async LogOut({ commit }) {
    commit("logout"); // No need to pass user since you're setting it to null directly
  },
};

const mutations = {
  setUser(state, name) {
    console.log('state',state,'name',name);
    state.user = name;
  },
  logout(state) {
    state.user = null;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
