import re
import json
import string
import codecs
import urllib2
from bs4 import BeautifulSoup

def readWikipedia():
    print "Getting Random!"
    response = urllib2.urlopen('http://en.wikipedia.org/w/api.php?format=json&action=query&list=random&rnnamespace=0&rnlimit=10&continue=')
    print "Random Lists Captured!"
    print "Parsing..."
    jsonDoc = json.loads(response.read())
    for i in range(0,10):
        id = jsonDoc[u'query'][u'random'][i][u'id']
        page = urllib2.urlopen('http://en.wikipedia.org/w/api.php?format=json&action=query&pageids={}&prop=revisions&rvprop=content&rvparse=1&continue='.format(id))
        jsonPage = json.loads(page.read())
        with codecs.open('../media/wikipedia.txt', 'a', 'UTF-8') as f:
            soup = BeautifulSoup(jsonPage[u'query'][u'pages'][unicode(id)][u'revisions'][0][u'*'], "html.parser")
            doc = ' '.join([' '.join([codecs.encode(string, 'UTF-8') for string in data.stripped_strings]) for data in soup.find_all('p')])
            docText = re.sub(r'\[ [0-9]*?(citation needed)? \]', '', doc.strip())
            f.write(codecs.decode(''.join([c for c in docText if c not in ',.\'"[]\\(){}!?@#$%^&*:;<>/+']).lower(), 'UTF-8').strip())
            f.write(u'\n')

while True:
    readWikipedia()
