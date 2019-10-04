import { configure, addParameters } from '@storybook/react';
import theme from './theme';

const req = require.context('../resources/ts', true, /\.stories\.tsx$/);

function loadStories() {
    req.keys().forEach(req);
}

addParameters({
    options: {
      theme: theme,
    },
  });

configure(loadStories, module);
