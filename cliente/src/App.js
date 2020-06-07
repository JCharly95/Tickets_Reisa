import React from 'react';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom  ';
import Login from './componentes/auth/Login';
import Admin from './componentes/admin/Obras/admin';
import RecuperarCuenta from './componentes/auth/RecuperarCuenta';

import ObrasState from './context/obras/obrasState';

function App() {

  return (
    <ObrasState>
      <Router>
        <Switch>
          <Route exact path="/" component={Login} />
          <Route exact path="/recuperarcuenta" component={RecuperarCuenta}/>
          <Route exact path="/admin" component={Admin}/>
        </Switch>
      </Router>
    </ObrasState>
  );
}

export default App;
