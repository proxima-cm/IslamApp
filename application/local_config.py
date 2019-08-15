# coding: utf-8

"""
Default Local Configuration
"""

APP_TITLE = 'IslamAPP'

PAGE_MENUS = [
    dict(
        name = 'Page One',
        url = "/"
    ),

    dict(
        name = 'Page Two',
        url = "/"
    )
]

COPYRIGHT = dict(
    name = 'IslamApp Contributors',
    url = "/"
)

FOOTER_LINKS = [
    dict(
        name = "Conditions d'utilisations",
        url = '/cgu'
    ),
    dict(
        name = U'Politique de confidentialité',
        url = '/privacy'
    ),
    dict(
        name = 'Flux RSS',
        url = '/recent.atom'
    )
]

MODULES = [

    # index module
    {'path': 'application.plugins.index.controllers.index', 'blueprint': 'app_index', 'url':None},
    {'path': 'application.plugins.index.controllers.user', 'blueprint': 'app_index', 'url':None},

    # dashboard module
    {'path': 'application.plugins.dashboard.controllers.admin_user', 'blueprint': 'app_dashboard', 'url':'/admin'},

]

MODULE_MENUS = [
    # html files for menus
]
