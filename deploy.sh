DEPLOY_DIR="/export/data/www/zhuangtu/"
GIT_DIR="/home/eng/zhuangtu/"
cd $GIT_DIR
git pull
sudo /usr/bin/rsync -av --exclude=deploy.sh --exclude=".git" --exclude=d $GIT_DIR $DEPLOY_DIR
sudo chown -R nginx:nginx $DEPLOY_DIR
cd -
