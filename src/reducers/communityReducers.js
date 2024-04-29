import {
  COMMUNITY_LIST_FAIL,
  COMMUNITY_LIST_REQUEST,
  COMMUNITY_LIST_SUCCESS,
} from "../constants/communityConstants";

export const communityListReducer = (state = { users: [] }, action) => {
  switch (action.type) {
    case COMMUNITY_LIST_REQUEST:
      return { loading: true };
    case COMMUNITY_LIST_SUCCESS:
      return { loading: false, users: action.payload };
    case COMMUNITY_LIST_FAIL:
      return { loading: false, error: action.payload };

    default:
      return state;
  }
};
