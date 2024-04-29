import axios from "axios";
import {
  COMMUNITY_LIST_FAIL,
  COMMUNITY_LIST_REQUEST,
  COMMUNITY_LIST_SUCCESS,
} from "../constants/communityConstants";

export const listCommunity = () => async (dispatch, getState) => {
  try {
    dispatch({
      type: COMMUNITY_LIST_REQUEST,
    });

    const {
      userLogin: { userInfo },
    } = getState();

    const config = {
      headers: {
        Authorization: `Bearer ${userInfo.token}`,
      },
    };

    const { data } = await axios.get(`/api/v1/users/`, config);

    dispatch({
      type: COMMUNITY_LIST_SUCCESS,
      payload: data,
    });
  } catch (error) {
    const message =
      error.response && error.response.data.message
        ? error.response.data.message
        : error.message;
    dispatch({
      type: COMMUNITY_LIST_FAIL,
      payload: message,
    });
  }
};
