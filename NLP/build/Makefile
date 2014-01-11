BUILDDIR    = ../bin/
SOURCEDIR   = ../src/

DIRS        = $(wildcard $(SOURCEDIR)*/)
VPATH       = $(SOURCEDIR):$(DIRS):$(foreach dir, $(DIRS), $(wildcard $(dir)*/))

IFILES     := $(shell find $(SOURCEDIR) -name '*.cpp')
OFILES     := $(subst $(SOURCEDIR), $(BUILDDIR), $(addsuffix .o, $(notdir $(shell find $(SOURCEDIR) -name '*.cpp'))))

CC          = g++
CCFLAGS     = -c -g -w -O3 -std=c++0x
LINKFLAGS   =

TARGET = ../bin/readWikipedia

all: $(TARGET)

$(TARGET): $(OFILES)
	$(CC) $(foreach file, $^, $(BUILDDIR)$(file)) $(LINKFLAGS) -o $@ $(DYNLINK)

%.cpp.o: %.cpp
	$(CC) $(CCFLAGS) $< -o $(BUILDDIR)$@

.PHONY: clean
clean:
	rm $(BUILDDIR)*
	rm $(TARGET)
