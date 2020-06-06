import React from 'react';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import Login from './componentes/auth/Login';
import Admin from './componentes/admin/admin';
import RecuperarCuenta from './componentes/auth/RecuperarCuenta';


function App() {

  return (
    <Router>
      <Switch>
        <Route exact path="/" component={Login} />
        <Route exact path="/recuperarcuenta" component={RecuperarCuenta}/>
        <Route exact path="/admin" component={Admin}/>
      </Switch>
    </Router>
  );
}

export default App;
