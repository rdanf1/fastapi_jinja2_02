#!/bin/bash
# DR - 19/03/2023
# ISSUE : Repeated too much times this sequences
#

# [ -v 1 ] won't do it ?!..
PARAM=$1

if [ -v $PARAM ]
then
	echo "********USAGE $O param1 <param2>"
	echo "---Needs at least one parameter" 
	echo " = 'd' for delete current"
	echo " = 'g' for go in param2='branch name'" 
	echo " OR <name> of branch to create"
	echo "*******************************"
	exit 1
fi

case $1 in
    # d = delete current branch
    d)
	echo "It's a go for deleting current BRANCH ?!" 
	BRANCH_TO_DELETE=$(git branch | grep "*" | cut -d" " -f 2)
  	echo "Do you really want to delete : \"$BRANCH_TO_DELETE\" (Ctrl-C to ABORT)" \
	      && read 
       (echo "Switching to main" && git checkout main) || (echo Pb main... && exit 1)
       (echo Deleting local $BRANCH_TO_DELETE && \
        git branch -d $BRANCH_TO_DELETE)               || (echo Pb local... && exit 1)
       (echo Deleting remote $BRANCH_TO_DELETE && \
	       git push -d origin $BRANCH_TO_DELETE)   || (echo Pb remote... && exit 1)
    ;;
    # g = going/switching to branch name given as 2d parameter
    g)
        BRANCH_TO_GO=$2
	echo "OK switching to BRANCH : \"$BRANCH_TO_GO\" (Ctrl-C to abort)" \
	      && read 
	git checkout $BRANCH_TO_GO                  || (echo Pb local... && exit 1)
	git push origin $BRANCH_TO_GO:$BRANCH_TO_GO || ( echo Pb remote... && exit 1 ) 
    ;;
    # What ever the Parameter is = name of new branch 
    *)
        BRANCH_NEW=$1
	echo "OK for Creating NEW BRANCH : \"$BRANCH_NEW\" (Ctrl-C to abort)" \
	      && read 
	git checkout -b $BRANCH_NEW              || (echo Pb local... && exit 1)
	git push origin $BRANCH_NEW:$BRANCH_NEW  || ( echo Pb remote... && exit 1 ) 
esac

# To see what happened...
git branch -a

exit 

# Very popular ( I don't ) 
# ( same effect for creating remotes for all local branches )
# git push --all -u

