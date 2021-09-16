import React, { useEffect } from 'react'
import { connect } from 'react-redux'
import { Provider } from 'react-redux'
import Router from './Router'

const Framework = ({}) => {

	return (
		<>
			<Router />
		</>
	)
}

const mapStateToProps = (state) => {
	return state
}

export default connect(mapStateToProps)(Framework);