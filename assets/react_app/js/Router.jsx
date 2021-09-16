import React, { useState, useEffect } from "react"
import ReactDOM from "react-dom"
import { connect } from 'react-redux'

import { HashRouter, Route, Switch, Redirect, BrowserRouter } from "react-router-dom"

import Dashboard from './pages/Dashboard'

const Router = ({ dispatch }) => {
	return (
		<BrowserRouter>
			<Switch>
				<Route path="/" component={Dashboard} />
			</Switch>
		</BrowserRouter>
	);
}

const mapStateToProps = (state) => {
	return state
}

export default connect(mapStateToProps)(Router);
