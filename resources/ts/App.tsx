import * as React from 'react';
import { Switch, Route } from 'react-router-dom';
import { PageLoader } from './components/PageLoader';

const Timeline = React.lazy(() => import('./views/Timeline'));

export default class App extends React.Component<{}, {}> {
  public render() {
    return (
      <React.Suspense fallback={<PageLoader />}>
        <Switch>
          <Route path="/" component={Timeline} />
        </Switch>
      </React.Suspense>
    );
  }
}
