import React from 'react';
import PropTypes from 'prop-types';
import AppBar from '@material-ui/core/AppBar';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';
import Box from '@material-ui/core/Box';

// importando valores de otras tablas
import TablaObra from './TablaObra';
import TablaChecadores from './TablaChecadores';
import TablaMateriales from './TablaMateriales';
import TablaTransportistas from './TablaTransportistas';

function TabPanel(props) {
  const { children, valores, indice} = props;

  return (
    <div
      role="tabpanel"
      hidden={valores !== indice}
      id={`scrollable-auto-tabpanel-${indice}`}
      aria-labelledby={`scrollable-auto-tab-${indice}`}
    >
      {valores === indice && (
        <Box p={3}>
          {children}
        </Box>
      )}
    </div>
  );
}

// indice de la tabla
function a11yProps(indice) {
  return {
    id: `scrollable-auto-tab-${indice}`,
    'aria-controls': `scrollable-auto-tabpanel-${indice}`,
  };
}

export default function ScrollableTabsButtonAuto() {
  
  const [valores, setvalores] = React.useState(0);

  const handleChange = (event, newvalores) => {
    setvalores(newvalores);
  };

  return (
    <div className="tablas">
      <AppBar position="static" color="default">
        <Tabs
          value={valores}
          onChange={handleChange}
          indicatorColor="primary"
          textColor="primary"
          variant="scrollable"
          scrollButtons="auto"
          aria-label="scrollable auto tabs example"
        >
          <Tab label="Obras" {...a11yProps(0)} />
          <Tab label="Checadores" {...a11yProps(1)} />
          <Tab label="Materiales" {...a11yProps(2)} />
          <Tab label="Transportistas" {...a11yProps(3)} />
          <Tab label="Camiones" {...a11yProps(4)} />
        </Tabs>
      </AppBar>
      <TabPanel valores={valores} indice={0}>
        <TablaObra/>
      </TabPanel>
      <TabPanel valores={valores} indice={1}>
        <TablaChecadores/>
      </TabPanel>
      <TabPanel valores={valores} indice={2}>
        <TablaMateriales/>
      </TabPanel>
      <TabPanel valores={valores} indice={3}>
        <TablaTransportistas/>
      </TabPanel>
      <TabPanel valores={valores} indice={4}>
        Item Five
      </TabPanel>

    </div>
  );
}

TabPanel.propTypes = {
    children: PropTypes.node,
    indice: PropTypes.any.isRequired,
    valores: PropTypes.any.isRequired,
  };