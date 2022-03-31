import Vuex from "vuex";
import DescriptionModule from "./description";
import AccessModule from "./access";
import PoiModule from "./poi";



export default new Vuex.Store({
  modules: {
    description: DescriptionModule,
    access: AccessModule,
    poi: PoiModule
  }
});

