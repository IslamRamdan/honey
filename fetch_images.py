import paramiko
import os

host = '82.25.96.66'
port = 65002
username = 'u496857821'
password = 'Ahmad$marwan$huda$12345'
remote_dir = '/home/u496857821/domains/beeandhoney.com/public_html/storage/app/public'
local_dir = 'c:\\Users\\ahmad\\source\\repos\\honey\\storage\\app\\public'

# Ensure local directory exists
if not os.path.exists(local_dir):
    os.makedirs(local_dir)

def sync_dir(sftp, remote_path, local_path):
    print(f"Checking directory: {remote_path}")
    try:
        items = sftp.listdir_attr(remote_path)
    except IOError as e:
        print(f"Error accessing {remote_path}: {e}")
        return

    for item in items:
        r_path = remote_path + "/" + item.filename
        l_path = os.path.join(local_path, item.filename)
        
        import stat
        if stat.S_ISDIR(item.st_mode):
            if not os.path.exists(l_path):
                os.makedirs(l_path)
            sync_dir(sftp, r_path, l_path)
        else:
            print(f"Downloading {r_path} to {l_path}...")
            sftp.get(r_path, l_path)

print("Connecting to Hostinger via SSH...")
ssh = paramiko.SSHClient()
ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

try:
    ssh.connect(host, port, username, password)
    print("Connected successfully!")
    sftp = ssh.open_sftp()
    
    # Check if the public_html path is correct
    try:
        sftp.chdir(remote_dir)
        print(f"Syncing from {remote_dir}...")
        sync_dir(sftp, remote_dir, local_dir)
    except IOError:
        print(f"Path {remote_dir} not found. Trying alternatives...")
        # Try alternative common structural paths
        alt_paths = [
            '/home/u496857821/public_html/storage/app/public',
            '/home/u496857821/domains/beeandhoney.com/public_html/public/storage',
            '/home/u496857821/public_html/public/storage',
            '/home/u496857821/public_html/images'
        ]
        
        for alt_path in alt_paths:
            try:
                print(f"Trying path: {alt_path}")
                items = sftp.listdir(alt_path)
                if items:
                    print(f"Found files in {alt_path}. Syncing...")
                    sync_dir(sftp, alt_path, local_dir)
                    break
            except IOError:
                continue

    sftp.close()
    ssh.close()
    print("Download completed!")
except Exception as e:
    print(f"Connection failed: {e}")
