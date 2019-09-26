# -*- coding: utf-8 -*-

import sys
from distutils.core import setup

kwargs = {}
if 'py2exe' in sys.argv:
    import py2exe
    kwargs = {
        'console' : [{
            'script'         : 'WSRest.py',
            'description'    : 'Enviar mail NodeID'
            }],
        'zipfile' : None,
        'options' : { 'py2exe' : {
            'dll_excludes'   : ['w9xpopen.exe'],
            'bundle_files'   : 1,
            'compressed'     : True,
            'optimize'       : 2
            }},
         }

setup(
    name='Enviar mail NodeID',
    author='Jesus Villanueva',
    author_email='jesus.vilanueva@telefonica.com',
    **kwargs)
