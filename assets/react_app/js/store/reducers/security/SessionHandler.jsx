
const initialState = {
	user: null
}

function SessionHandler(state = initialState, action) {
	switch(action.type) {
		case 'session:disconnect':
			return initialState
		
		case 'session:authenticate': 
			return {...state, user: action.user}

		default:
			return state
	}
}

export default SessionHandler;