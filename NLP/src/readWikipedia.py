import json
import re
import string
import codecs
import urllib2
import HTMLParser

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
			text = "".join(c for c in HTMLParser.HTMLParser().unescape(re.sub(r'\[(citation needed)?[0-9]*?\]', u'', u' '.join([re.sub(r'<[^>]*?>', u'', match).strip() for match in re.findall(r'<p>.*?</p>', jsonPage[u'query'][u'pages'][unicode(id)][u'revisions'][0][u'*'], re.DOTALL)]))) if c not in string.punctuation).lower()
			if len(text) > 100:
				f.write(text)
				f.write(u'\n')

i = 1
while True:
	readWikipedia()
	print i
	i = i + 1