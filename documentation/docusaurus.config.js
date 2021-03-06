const lightCodeTheme = require('prism-react-renderer/themes/github');
const darkCodeTheme = require('prism-react-renderer/themes/dracula');

// With JSDoc @type annotations, IDEs can provide config autocompletion
/** @type {import('@docusaurus/types').DocusaurusConfig} */
(module.exports = {
  title: 'Scuba',
  tagline: 'Solution de gestion pour les clubs de plongée',
  url: 'https://your-docusaurus-test-site.com',
  baseUrl: '/',
  onBrokenLinks: 'throw',
  onBrokenMarkdownLinks: 'warn',
  favicon: 'img/favicon.ico',
  organizationName: 'scuba', // Usually your GitHub org/user name.
  projectName: 'scuba', // Usually your repo name.

  plugins: [
    [require.resolve('@cmfcmf/docusaurus-search-local'), {
        indexDocs: true,
        docsRouteBasePath: '/docs',
        indexDocSidebarParentCategories: 0,
        indexBlog: true,
        blogRouteBasePath: '/blog',
        indexPages: false,
        language: "fr",
        style: undefined,
        lunr: {
          tokenizerSeparator: /[\s\-]+/
      }
    }]
  ],

  presets: [
    [
      '@docusaurus/preset-classic',
      /** @type {import('@docusaurus/preset-classic').Options} */
      ({
        docs: {
          sidebarPath: require.resolve('./sidebars.js'),
          sidebarCollapsible: true,
          // Please change this to your repo.
          editUrl: 'https://github.com/facebook/docusaurus/edit/main/website/',
        },
        blog: {
          showReadingTime: true,
          // Please change this to your repo.
          editUrl:
            'https://github.com/facebook/docusaurus/edit/main/website/blog/',
        },
        theme: {
          customCss: require.resolve('./src/css/custom.css'),
        },
      }),
    ],
  ],

  themeConfig:
    /** @type {import('@docusaurus/preset-classic').ThemeConfig} */
    ({
      navbar: {
        title: 'Scuba',
        logo: {
          alt: 'Documentation Logo',
          src: 'img/logo.svg',
          href: '/docs/intro'
        },
        items: [
          {
            type: 'doc',
            docId: 'intro',
            position: 'left',
            label: 'Documentation',
          },
          {to: '/blog', label: 'Actualités', position: 'left'},
        ],
      },
      footer: {
        style: 'dark',
        copyright: `Copyright © ${new Date().getFullYear()} Diveblob<br>Documentation construite avec Docusaurus.`,
      },
      prism: {
        theme: lightCodeTheme,
        darkTheme: darkCodeTheme,
        additionalLanguages: ['php'],
      },
      hideableSidebar: true,
    }),
});
