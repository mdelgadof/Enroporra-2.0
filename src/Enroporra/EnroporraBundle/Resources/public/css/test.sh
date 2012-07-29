for f in headers*.css; do
  #sed 's/OLD_STRING/NEW_STRING' $f > $TMPFILE
  #exit 1     # DEBUG
  #mv $TMPFILE $f
sed s/repeat\-x\;/no-repeat\;\ background\-position\:center\;/ $f > temp.css
mv temp.css $f
echo "$f";
done

